**SPACEWORK**



Configuration:


Database:
Dans le dossier "Database", vous devriez trouver un fichier SQL contenant les requêtes pour créer les tables nécessaires à l'application. 
Base de donnée utilisé mysql

Configuration de base_url :

Dans le fichier config/config.php, Changer le domaine dans $config['base_url'] et modifiez-la en fonction de votre configuration.
J'ai utilisé $config['base_url'] = 'http://ci.tes/'; dans mon server local.

Configuration d'Envoi d'email :

Dans les méthodes notify() et store() du contrôleur AdminController, 
vous devez spécifier les informations d'authentification SMTP pour l'envoi d'e-mails. Les paramètres 'Username' et 'Password' doivent être configurés pour le compte e-mail à partir duquel vous souhaitez envoyer les e-mails. 
Assurez-vous également que le paramètre 'Host' est correct et correspond au serveur SMTP que vous souhaitez utiliser pour l'envoi d'e-mails.





Rapport de fonctionnalité du contrôleur AuthController :

Le contrôleur AuthController est responsable de la gestion de l'authentification et de la déconnexion des utilisateurs.
 Voici les principales fonctionnalités de ce contrôleur :

Méthode is_auth() : 
Cette méthode est utilisée pour vérifier si l'utilisateur est déjà authentifié en vérifiant la présence de l'identifiant de matricule dans la session. 
Si l'utilisateur est authentifié, cette méthode retourne l'identifiant de matricule, sinon elle retourne null.

Méthode index() : 
Cette méthode affiche la page de connexion si l'utilisateur n'est pas déjà authentifié. Si l'utilisateur est déjà connecté, 
il est redirigé vers la page user_info. La méthode charge les vues header/head, login et footer/footer.

Méthode login() : 
Cette méthode gère le processus de connexion de l'utilisateur. Elle vérifie les entrées du formulaire (identifiant de matricule et code d'accès) et les valide.
Si les règles de validation sont respectées, elle recherche l'utilisateur dans la base de données en utilisant le modèle EmployeeModel. Si l'utilisateur est trouvé, le code d'accès est vérifié pour voir s'il correspond à celui enregistré dans la base de données. 
Si les informations d'identification sont valides, l'utilisateur est connecté en créant une session pour lui et en le redirigeant vers la page user_info. Si le compte de l'utilisateur n'est pas activé ($user->status == 0), un message d'erreur approprié est affiché et l'utilisateur est redirigé vers la page de connexion.

Méthode logout() : 
Cette méthode gère le processus de déconnexion de l'utilisateur. Elle détruit la session de l'utilisateur et le supprime de la liste des utilisateurs connectés dans la base de données.
 Enfin, l'utilisateur est redirigé vers la page de connexion.




Rapport de fonctionnalité du contrôleur HomeController :

Le contrôleur HomeController gère la page d'accueil de l'utilisateur après la connexion réussie. 


Voici les principales fonctionnalités de ce contrôleur :

Méthode auth() : 
Cette méthode est utilisée pour vérifier si l'utilisateur est déjà authentifié en vérifiant la présence de l'identifiant de matricule dans la session. 
Si l'utilisateur est authentifié, cette méthode retourne l'identifiant de matricule, sinon elle retourne null.

Méthode home() : 
Cette méthode gère l'affichage de la page d'accueil de l'utilisateur authentifié. Si l'utilisateur n'est pas authentifié, 
il est redirigé vers la page de connexion (base_url('/')). Sinon, la méthode charge les vues header/head, home et footer/footer pour afficher la page d'accueil.

Données du profil de l'utilisateur : 
Dans la méthode home(), la variable $data['profile'] est définie pour stocker les informations du profil de l'utilisateur. 
Elle utilise le modèle EmployeeModel pour obtenir les informations du profil à partir de l'identifiant de matricule stocké dans la session.



Rapport de fonctionnalité du contrôleur AdminController :

Le contrôleur AdminController est responsable de la gestion des fonctionnalités d'administration, destinées aux utilisateurs ayant un rôle d'administrateur ("admin=true"). 

Ce contrôleur assure que seuls les utilisateurs ayant ce rôle peuvent accéder aux fonctionnalités d'administration.

 Voici les principales fonctionnalités de ce contrôleur :

Méthode is_admin() : 
Cette méthode est utilisée pour vérifier si l'utilisateur a le rôle d'administrateur en vérifiant la valeur de la clé "is_admin" dans la session. 
Si l'utilisateur a le rôle d'administrateur, cette méthode retourne true, sinon elle retourne false.

Constructeur :
 Le constructeur de ce contrôleur vérifie si l'utilisateur a le rôle d'administrateur en appelant la méthode is_admin(). 
 Si l'utilisateur n'a pas le rôle d'administrateur, il est redirigé vers la page "user_info" et un message d'erreur est affiché.

Méthode index() : 
Cette méthode affiche le tableau de bord de l'administrateur. 
Elle récupère le nombre d'utilisateurs actifs, le nombre d'utilisateurs non actifs et le nombre total d'utilisateurs ayant le rôle d'administrateur à partir du modèle EmployeeModel. 
La vue "admin/dashbord" est chargée pour afficher ces informations.

Méthode form_to_add_user()
 : Cette méthode affiche le formulaire pour ajouter un nouvel employé. 
 La vue "admin/add" est chargée pour afficher le formulaire.

Méthode list_active_user() : 
Cette méthode récupère tous les utilisateurs actifs à partir du modèle EmployeeModel et les affiche dans la vue "admin/list" pour afficher la liste des employés actifs.

Méthode generateAccessCode($length) : 
Cette méthode génère un code d'accès aléatoire de longueur spécifiée. 
Ce code est utilisé lors de l'ajout d'un nouvel employé pour lui attribuer un code d'accès.

Méthode notify($email, $access_code, $lastname) :
 Cette méthode envoie un e-mail à un utilisateur contenant son code d'accès. 
 Elle utilise la bibliothèque PhpMailer_lib pour envoyer l'e-mail.

Méthode store() : 
Cette méthode traite le formulaire d'ajout d'un nouvel employé.
 Elle effectue la validation des entrées du formulaire et vérifie si l'identifiant de matricule est unique dans la base de données. 
 Si la validation réussit, elle insère les données du nouvel employé dans la base de données à l'aide du modèle EmployeeModel. 
 Un code d'accès est généré pour l'employé et envoyé par e-mail. 
 Un message de succès ou d'erreur est affiché en fonction du résultat de l'opération.

Méthodes edit($id) et post_edit($id) : 
Ces méthodes permettent de modifier les informations d'un employé. 
La première méthode affiche le formulaire de modification, tandis que la seconde traite le formulaire de modification. 
Un message de succès ou d'erreur est affiché en fonction du résultat de l'opération.

Méthode delete($id) et corfirm_to_delete($id) : 

Ces méthodes gèrent la suppression d'un employé.
 La première méthode affiche la confirmation de suppression, tandis que la seconde confirme la suppression après validation.

Méthode employee_not_active() et corfirm_to_restore($id) : 

Ces méthodes gèrent la liste des employés inactifs et leur restauration en tant qu'employés actifs.

Méthode get_connected_users() :

 Cette méthode renvoie la liste des utilisateurs connectés sous forme de réponse JSON pour une utilisation avec AJAX



Le modèle EmployeeModel est responsable de l'accès à la base de données et de l'exécution des requêtes pour les fonctionnalités liées aux utilisateurs. 

Voici une explication des principales méthodes de ce modèle :

Méthode insertUser($data) : 

Cette méthode permet d'insérer un nouvel utilisateur dans la table 'users' de la base de données. 
Elle reçoit un tableau associatif $data contenant les informations de l'utilisateur (matriculId, firstname, lastname, email, stack, access_code) et effectue l'insertion dans la base de données en utilisant la fonction insert() de CodeIgniter.

Méthode get_user($matriculeId) :

 Cette méthode permet de récupérer un utilisateur en fonction de son identifiant de matricule ($matriculeId).
 Elle utilise la fonction get_where() de CodeIgniter pour exécuter une requête SQL pour récupérer l'utilisateur correspondant à cet identifiant de matricule dans la table 'users'.

Méthodes get_all_users()et get_all_users_not_active() :

 Ces méthodes récupèrent tous les utilisateurs actifs et inactifs, respectivement, à partir de la table 'users'.
 Elles utilisent la fonction get_where() de CodeIgniter avec le paramètre 'status' pour filtrer les résultats selon le statut de l'utilisateur.

Méthodes update_user($data, $id), confirm_delete($data, $id) et confirm_restore($data, $id) : 

Ces méthodes mettent à jour les informations de l'utilisateur dans la table 'users'.
 Elles utilisent la fonction update() de CodeIgniter pour exécuter les requêtes SQL de mise à jour en fonction de l'identifiant de matricule ($id) passé en paramètre.

Méthodes get_count_active_user(), get_count_not_active_user() et get_count_admin() : 

Ces méthodes retournent le nombre d'utilisateurs actifs, le nombre d'utilisateurs inactifs et 
le nombre d'utilisateurs ayant le rôle d'administrateur (is_admin=true) à partir de la table 'users'. Elles utilisent 
des requêtes SQL avec la fonction query() de CodeIgniter pour obtenir les résultats.

Méthode users_connected() : 
Cette méthode récupère la liste des utilisateurs connectés à partir de la table 'connected_users' et renvoie les données sous forme de réponse JSON.
 Elle utilise la fonction get() de CodeIgniter pour récupérer les données de la table et json_encode() pour les encoder en JSON.

Méthode remove_user_from_connected_list() : 
Cette méthode supprime l'utilisateur actuellement connecté de la table 'connected_users' lorsque l'utilisateur se déconnecte.
 Elle est appelée dans le contrôleur AdminController lors de la déconnexion.

Méthode get_id_from_list($matriculId) : 
Cette méthode recherche un utilisateur dans la table 'connected_users' en fonction de son identifiant de matricule ($matriculId). 
Elle est utilisée pour vérifier si l'utilisateur est déjà connecté avant de l'ajouter à la table.

Méthode actions($id, $adminId, $action_name) : 
Cette méthode insère une action effectuée par un administrateur sur un utilisateur dans la table 'action_s'. 
Les informations enregistrées comprennent l'identifiant de l'utilisateur concerné ($id), l'identifiant de l'administrateur qui a effectué l'action ($adminId) et le nom de l'action ($action_name). 
Cette table peut être utilisée pour suivre les activités effectuées par les administrateurs sur les utilisateurs.

