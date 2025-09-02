const express = require('express');
const app = express();
const PORT = 3000;

app.get('/', (req, res) => {
  res.send('Welcome to the Home Page');
});

app.get('/about', (req, res) => {
  res.send('This is the About Page');
});

app.get('/contact', (req, res) => {
  res.send('Contact us at contact@example.com');
});

app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
