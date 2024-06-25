let tablepayment=document.querySelector('.table');
let printer=document.querySelector('#print');
printer.addEventListener('click',()=>{
   newWindow=window.open('impression.html','imprimer','height=400,width=600');
   newWindow.document.write('<html><head>');
   newWindow.document.write('<link rel="stylesheet" href="style/style.css">');
   newWindow.document.write('</head><body>');
   newWindow.document.write(tablepayment.outerHTML);
   newWindow.document.write('</body>');
   newWindow.document.write('</html>');
   newWindow.document.close();
   newWindow.print();
});