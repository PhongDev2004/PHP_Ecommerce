<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="box">

</div>
    <script>
        const box = document.querySelector('.box')
        fetch("http://localhost/da1/src/api.php?order=1")
            .then(res => res.json())
            .then(res => {
                console.log(res);
                const data =res.map(item => {
                    return `${item} - 1`
                }).join('')

                box.innerHTML = data
            })

        
    </script>
</body>
</html>