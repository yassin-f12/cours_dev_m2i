import express from "express";
import { query } from "./db.js";

const app = express();

app.use(express.json());

app.get("/users", async (req, res) => {
  const result = await query("SELECT * FROM users");
  res.json(result.rows);
});

app.post("/users", async (req, res) => {
  const { name, email } = req.body;

  const result = await query(
    "INSERT INTO users(name, email) VALUES($1, $2) RETURNING *",
    [name, email],
  );

  res.json(result.rows[0]);
});

app.get("/health", (req, res) => {
  res.json({ status: "ok" });
});

app.listen(3000, () => {
  console.log("Serveur démarré sur le port 3000");
});
