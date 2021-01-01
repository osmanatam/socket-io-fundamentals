var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

// app.get('/',function (req,res){
//     res.send("Socket Uygulaması");
// });

io.on("connection",function (socket){

    console.log("Kullanıcı Geldi");

    socket.on("disconnect",function (){
        console.log("Kullanıcı Geldi ve Gitti");
    });

    socket.on("add_news",function (data){
        io.emit("show_news",data);
    });
});

http.listen(3000,function (){
    console.log("3000 Portu Dinleniyor");
});
