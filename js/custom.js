function ajaxDeleteImage(image) {
    if(confirm('Revert to default image?')){
        xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                let main = document.getElementsByClassName('main')[0];
                let elem = document.createElement("div");
                elem.setAttribute('class', 'section');
                elem.setAttribute('onclick', 'this.style.display="none";');
                elem.innerHTML = '<p style="color:#f30;font-size:0.9em;"><b>&#10004;</b> ' + xmlhttp.responseText + '</p>';
                main.insertBefore(elem, main.children[0]);
            }
        }

        xmlhttp.open('GET', '../action/cms/ajax_delete_file.php?file=' + image, true);
        xmlhttp.send();
    }
}