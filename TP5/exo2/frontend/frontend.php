<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exo 2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <h2>Ajouter un utilisateur</h2>
        <form id="add-form">
            <div class="form-group">
                <label for="login-input">Login</label>
                <input type="text" class="form-control" id="login-input" required>
            </div>
            <div class="form-group">
                <label for="email-input">Email</label>
                <input type="email" class="form-control" id="email-input" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <script>

        let URL_API="<?php require_once('config.php'); echo URL_API; ?>";

        // Fonction pour récupérer la liste des utilisateurs via l'API
        function getUsers() {
            $.ajax({
                url: URL_API, // URL de l'API
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Si la requête réussit, on met à jour le tableau des utilisateurs
                    var table = $('#myTable').DataTable();
                    table.clear();
                    $.each(response, function(i, user) {
                        table.row.add([
                            user.id,
                            user.login,
                            user.email,
                            '<button class="btn btn-sm btn-primary edit-btn" data-id="' + user.id + '">Modifier</button> ' +
                            '<button class="btn btn-sm btn-danger delete-btn" data-id="' + user.id + '">Supprimer</button>'
                        ]).draw();
                    });
                },
                error: function() {
                    // Si la requête échoue, on affiche une erreur
                    alert('Erreur lors de la récupération des utilisateurs');
                }
            });
        }

        // Fonction pour ajouter un utilisateur via l'API
        function addUser(login, email) {
            $.ajax({
                url: URL_API, // URL de l'API
                type: 'POST',
                data: JSON.stringify({ login: login, email: email }),
                dataType: 'json',
                success: function(response) {
                    // Si la requête réussit, on met à jour le tableau des utilisateurs
                    getUsers();
                },
                error: function() {
                    // Si la requête échoue,
                    alert('Erreur lors de l\'ajout de l\'utilisateur');
            }
        });
    }

    // Fonction pour modifier un utilisateur via l'API
    function editUser(id, login, email) {
        $.ajax({
            url: URL_API, // URL de l'API avec l'ID de l'utilisateur
            type: 'PUT',
            data: JSON.stringify({ id : id, login: login, email: email }),
            dataType: 'json',
            success: function(response) {
                // Si la requête réussit, on met à jour le tableau des utilisateurs
                getUsers();
            },
            error: function() {
                // Si la requête échoue, on affiche une erreur
                alert('Erreur lors de la modification de l\'utilisateur');
            }
        });
    }

    // Fonction pour supprimer un utilisateur via l'API
    function deleteUser(id) {
        $.ajax({
            url: URL_API + '?id=' + id, // URL de l'API avec l'ID de l'utilisateur
            type: 'DELETE',
            dataType: 'json',
            success: function(response) {
                // Si la requête réussit, on met à jour le tableau des utilisateurs
                getUsers();
            },
            error: function() {
                // Si la requête échoue, on affiche une erreur
                alert('Erreur lors de la suppression de l\'utilisateur');
            }
        });
    }

    $(document).ready(function() {

        // Initialisation du tableau DataTable
        $('#myTable').DataTable();

        // Récupération de la liste des utilisateurs au chargement de la page
        getUsers();

        // Ajout d'un utilisateur
        $('#add-form').submit(function(e) {
            e.preventDefault();
            var login = $('#login-input').val();
            var email = $('#email-input').val();
            addUser(login, email);
        });

        // Modification d'un utilisateur
        $('#myTable tbody').on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            var login = prompt('Entrez le nouveau login :');
            var email = prompt('Entrez le nouvel email :');
            editUser(id, login, email);
        });

        // Suppression d'un utilisateur
        $('#myTable tbody').on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            if (confirm('Voulez-vous vraiment supprimer cet utilisateur ?')) {
                deleteUser(id);
            }
        });
    });
</script>



