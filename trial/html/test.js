const fs = require('fs');
const mysql = require('mysql');

// Get the temporary file path
const MY_FILE = req.files.file.tempFilePath;

// Open the file and store its contents in fileContents
const fileContents = fs.readFileSync(MY_FILE);

// Escape special characters in fileContents
const escapedContents = mysql.escape(fileContents);

// Connect to the database
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'password',
  database: 'herbarium_db'
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to database:', err);
    return;
  }

  // Insert the file contents into the database
  const query = `INSERT INTO files SET file_data=${escapedContents}`;
  connection.query(query, (err, result) => {
    if (err) {
      console.error('Error inserting file into database:', err);
      return;
    }

    console.log('File INSERTED into files table successfully.');
    connection.end();
  });
});
