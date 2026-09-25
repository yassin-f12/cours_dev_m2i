const express = require("express");

const app = express();

app.get("/message", (req, res) => {
  res.json({
    message: "Salut ! Je viens de Node.js",
  });
});

app.listen(3000, () => {
  console.log("Node écoute sur le port 3000");
});
