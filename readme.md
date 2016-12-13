# Simple Raspberry Pi API Server

## Test On RPi
`curl -H apitoken:YOURTOKEN http://example.com/api/test`
`curl -i -H apitoken:YOURTOKEN -F image=@YOURFILE.JPG http://example.com/api/upload`

## Simple Node.js Run On RPi To Upload File
```js
var fs = require('fs');
var exec = require('child_process').exec;

var file = "YOURFILE.JPG";
var cmd = "curl -i -H apitoken:YOURTOKEN -F image=@" + file + " http://example.com/api/upload";
function throwing() {
    fs.readFile(file, function (err, content) {
        exec(cmd, function(error, stdout, stderr) {
           console.log(stdout);
        });
    });
}

//throwing();
setInterval(throwing, 300);
```
