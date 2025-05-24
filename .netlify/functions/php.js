const { execSync } = require('child_process');

exports.handler = async (event, context) => {
  try {
    // Jalankan PHP via shell (menggunakan PHP runtime di Netlify)
    const result = execSync(`php -r "echo file_get_contents('${__dirname}/../../bot.php');"`).toString();
    
    return {
      statusCode: 200,
      body: result,
      headers: { 'Content-Type': 'text/html' }
    };
  } catch (error) {
    return { statusCode: 500, body: 'Error running PHP' };
  }
};
