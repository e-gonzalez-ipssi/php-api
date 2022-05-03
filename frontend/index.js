(async () => {
    let formData = new FormData;
    formData.append('name', "PHP 8.1");
    const response = await fetch('http://localhost:8000/categorie', {
        method: "POST",
        headers: {
            "content-type": "multipart/form-data",
            "token": "voiture"
        },
        body: formData
    });
    const content = await response.json();
    console.log(content)
})();