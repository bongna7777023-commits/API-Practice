<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Category</title>
</head>

<body>
    <div class="tbl-wrap">
        <div class="header">
            <span>Categories</span>
            <button>Add category</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Is Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
    </div>
    <script>
        fetch('/api/categories')
            .then(res => res.json())
            .then(({ data }) => {
                const tbody = document.getElementById('tbody');
                data.forEach(cat => {
                    tbody.innerHTML += `
                <tr>
                    <td>${cat.id}</td>
                    <td>${cat.name}</td>
                    <td>${cat.description}</td>
                    <td>${cat.is_active ? 'Active' : 'In-Active'}</td>
                    <td>
                        <a href="/categories/${cat.id}/edit">Edit</a>
                        <a href="#" onclick="deleteCategory(${cat.id})">Delete</a>
                    </td>
                </tr>`
                });
            });
    </script>
</body>

</html>
