var app = require('express')();
var server = require('http').createServer(app);
var io = require('socket.io')(server);

app.get('/', (req, res) => {
  res.send('<h1>Hello world</h1>');
});

io.on("connection", socket => {
  console.log("a user connected :D");
  socket.on("message", msg => {
    io.emit("message", msg);
  });
});

server.listen(3000);