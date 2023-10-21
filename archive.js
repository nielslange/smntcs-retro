/* eslint-disable no-undef */
/* eslint-disable no-console */

// require modules
var fs = require("fs");
var archiver = require("archiver");

// list of files to add
var files = [
	"LICENSE",
	"README.txt",
	"comments.php",
	"footer.php",
	"functions.php",
	"header.php",
	"index.php",
	"rtl.css",
	"screenshot.png",
	"single.php",
	"style.css",
];

// list of directories to add
var directories = ["assets", "inc", "template-parts"];

// create a file to stream archive data to.
var version = "2.0";
var output = fs.createWriteStream(
	__dirname + "/dist/smntcs-retro-" + version + ".zip"
);
var archive = archiver("zip", { zlib: { level: 9 } });

// listen for all archive data to be written
// 'close' event is fired only when a file descriptor is involved
output.on("close", function () {
	console.log(archive.pointer() + " total bytes");
	console.log(
		"archiver has been finalized and the output file descriptor has closed."
	);
});

// This event is fired when the data source is drained no matter what was the data source.
// It is not part of this library but rather from the NodeJS Stream API.
// @see: https://nodejs.org/api/stream.html#stream_event_end
output.on("end", function () {
	console.log("Data has been drained");
});

// good practice to catch this error explicitly
archive.on("warning", function (err) {
	if (err.code === "ENOENT") {
		console.log(err);
	} else {
		throw err;
	}
});

// good practice to catch this error explicitly
archive.on("error", function (err) {
	throw err;
});

// pipe archive data to the file
archive.pipe(output);

// append files
files.forEach((element) => {
	archive.file(element, { name: element });
});

// append directories
directories.forEach((element) => {
	archive.directory(element, element);
});

// finalize the archive (ie we are done appending files but streams have to finish yet)
// 'close', 'end' or 'finish' may be fired right after calling this method so register to them beforehand
archive.finalize();
