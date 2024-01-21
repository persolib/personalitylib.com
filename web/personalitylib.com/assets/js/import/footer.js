// Dateien laden
const files_footer = [""];

// Inhalt aus `template.html` lesen
const request_footer = new XMLHttpRequest();
request_footer.open('GET', 'assets/html/footer.html');
request_footer.responseType = 'text';

request_footer.onload = () => {
  const templateContent = request_footer.responseText;

  // Inhalt in `<footer>`-Tags einfügen
  files_footer.forEach(file => {
    const footer = document.querySelector(`footer`, file);
    footer.innerHTML += templateContent;
  });
};

request_footer.send();
