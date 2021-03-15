const httpServer = require("http");
const fs = require("fs");
const port = 3000;
const files = { "content-Type": "text/html" };
const server = httpServer.createServer(function(request, response) {
    response.writeHead(200, files);
    fs.readFile("../html/index.html", (error, data) => {
        if (error) {
            response.writeHead(404);
            response.write("error could not find out file");
        } else {
            response.write(data);
        }
        response.end();
    });
});

server.listen(port, (error) => {
    if (error) {
        console.log("error:", error);
    } else {
        console.log("server is listening to port: " + port);
    }
});