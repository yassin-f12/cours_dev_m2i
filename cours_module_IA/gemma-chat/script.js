const OLLAMA_URL = "http://localhost:11434/api/chat";
const MODEL = "gemma4:12b";

const STORAGE_KEY = "gemma-chat-conversations";

const newChatButton = document.querySelector(".new-chat");
const historyList = document.querySelector(".history-list");
const messagesContainer = document.querySelector(".messages");
const chatContainer = document.querySelector(".chat-container");
const welcome = document.querySelector(".welcome");
const chatForm = document.querySelector(".chat-form");
const messageInput = chatForm.querySelector("textarea");
const sendButton = chatForm.querySelector("button");

let conversations = loadConversations();
let activeConversationId = null;
let isLoading = false;

function loadConversations() {
  try {
    return JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
  } catch {
    return [];
  }
}

function saveConversations() {
  localStorage.setItem(STORAGE_KEY, JSON.stringify(conversations));
}

function createConversation() {
  const conversation = {
    id: crypto.randomUUID(),
    title: "Nouvelle discussion",
    messages: [],
    createdAt: Date.now(),
  };

  conversations.unshift(conversation);

  activeConversationId = conversation.id;

  saveConversations();
  renderHistory();
  renderMessages();
}

function getActiveConversation() {
  return conversations.find(
    (conversation) => conversation.id === activeConversationId,
  );
}

function selectConversation(id) {
  if (isLoading) return;

  activeConversationId = id;

  renderHistory();
  renderMessages();
}

function deleteConversation(id) {
  if (isLoading) return;

  conversations = conversations.filter(
    (conversation) => conversation.id !== id,
  );

  if (activeConversationId === id) {
    activeConversationId = null;
  }

  saveConversations();
  renderHistory();
  renderMessages();
}

function renderHistory() {
  historyList.innerHTML = "";

  conversations.forEach((conversation) => {
    const item = document.createElement("div");
    item.className = "history-item";

    if (conversation.id === activeConversationId) {
      item.classList.add("active");
    }

    const title = document.createElement("button");
    title.className = "history-title";
    title.textContent = conversation.title;

    title.addEventListener("click", () => {
      selectConversation(conversation.id);
    });

    const deleteButton = document.createElement("button");
    deleteButton.className = "delete-chat";
    deleteButton.textContent = "×";
    deleteButton.title = "Supprimer la conversation";

    deleteButton.addEventListener("click", () => {
      deleteConversation(conversation.id);
    });

    item.append(title, deleteButton);
    historyList.appendChild(item);
  });
}

function renderMessages() {
  messagesContainer.innerHTML = "";

  const conversation = getActiveConversation();

  const hasMessages = conversation?.messages.length > 0;

  welcome.hidden = hasMessages;

  if (!conversation) return;

  conversation.messages.forEach((message) => {
    addMessageToDOM(message);
  });

  scrollToBottom();
}

function addMessageToDOM(message) {
  const messageElement = document.createElement("div");

  messageElement.className = `message ${message.role}`;

  if (message.error) {
    messageElement.classList.add("error");
  }

  if (message.role === "assistant") {
    const avatar = document.createElement("div");
    avatar.className = "message-avatar";
    avatar.textContent = "✦";

    messageElement.appendChild(avatar);
  }

  const content = document.createElement("div");
  content.className = "message-content";
  if (message.role === "assistant") {
    content.innerHTML = marked.parse(message.content);
  } else {
    content.textContent = message.content;
  }

  messageElement.appendChild(content);

  messagesContainer.appendChild(messageElement);

  return messageElement;
}

function scrollToBottom() {
  chatContainer.scrollTop = chatContainer.scrollHeight;
}

function showTyping() {
  const typing = document.createElement("div");

  typing.className = "message assistant";
  typing.id = "typing-indicator";

  const avatar = document.createElement("div");
  avatar.className = "message-avatar";
  avatar.textContent = "✦";

  const text = document.createElement("div");
  text.className = "typing";
  text.textContent = "Gemma réfléchit...";

  typing.append(avatar, text);
  messagesContainer.appendChild(typing);

  scrollToBottom();
}

function hideTyping() {
  document.querySelector("#typing-indicator")?.remove();
}

async function askGemma(conversation) {
  const response = await fetch(OLLAMA_URL, {
    method: "POST",

    headers: {
      "Content-Type": "application/json",
    },

    body: JSON.stringify({
      model: MODEL,

      messages: conversation.messages
        .filter((message) => !message.error)
        .map((message) => ({
          role: message.role,
          content: message.content,
        })),

      stream: false,
    }),
  });

  if (!response.ok) {
    throw new Error(
      `Erreur Ollama : ${response.status} ${response.statusText}`,
    );
  }

  const data = await response.json();

  if (!data.message?.content) {
    throw new Error("Ollama n'a retourné aucune réponse.");
  }

  return data.message.content;
}

async function sendMessage(text) {
  if (isLoading || !text.trim()) return;

  if (!activeConversationId) {
    createConversation();
  }

  const conversation = getActiveConversation();

  const userMessage = {
    role: "user",
    content: text.trim(),
  };

  conversation.messages.push(userMessage);

  if (conversation.messages.length === 1) {
    conversation.title = text.trim().slice(0, 35);

    if (text.trim().length > 35) {
      conversation.title += "...";
    }
  }

  saveConversations();
  renderHistory();
  renderMessages();

  isLoading = true;
  sendButton.disabled = true;
  messageInput.disabled = true;

  showTyping();

  try {
    const answer = await askGemma(conversation);

    conversation.messages.push({
      role: "assistant",
      content: answer,
    });
  } catch (error) {
    console.error(error);

    conversation.messages.push({
      role: "assistant",
      content: `Impossible de contacter Ollama.\n\n${error.message}\n\nVérifie qu'Ollama est démarré et que ton modèle ${MODEL} est installé.`,
      error: true,
    });
  } finally {
    hideTyping();

    isLoading = false;
    sendButton.disabled = false;
    messageInput.disabled = false;

    messageInput.focus();

    saveConversations();
    renderMessages();
    renderHistory();
  }
}

newChatButton.addEventListener("click", () => {
  if (isLoading) return;

  activeConversationId = null;

  createConversation();
  messageInput.focus();
});

chatForm.addEventListener("submit", (event) => {
  event.preventDefault();

  const text = messageInput.value;

  if (!text.trim() || isLoading) return;

  messageInput.value = "";
  messageInput.style.height = "auto";

  sendMessage(text);
});

messageInput.addEventListener("keydown", (event) => {
  if (event.key === "Enter" && !event.shiftKey) {
    event.preventDefault();
    chatForm.requestSubmit();
  }
});

messageInput.addEventListener("input", () => {
  messageInput.style.height = "auto";

  messageInput.style.height = `${messageInput.scrollHeight}px`;
});

renderHistory();
renderMessages();
