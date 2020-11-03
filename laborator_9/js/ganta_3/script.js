const readline = require("readline");
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

rl.question("Password: ", function(password) {
    var guess_pass = "";
    var tries = 0;
    var buffer = [];

    do {
        do {
            guess_pass = Math.random().toString(36).substring(9);
        } while (buffer.find(item => item === guess_pass) !== undefined);

        console.log(++tries, guess_pass);

        if (guess_pass === password) {
            console.log(`Your password: ${guess_pass}`);
            return;
        }
    } while (guess_pass != password);
});

rl.on("close", function() {
    console.log("\nBYE BYE !!!");
    process.exit(0);
});