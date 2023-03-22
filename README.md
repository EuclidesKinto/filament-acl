# Filament com ACL -  Sem o Pacote Spatie

## DEscrição

Construção de um ADMIN com ACL(Access Control List) que define as permissões de acesso de um usuário a um determinado componente ou serviço de um sistema, como um arquivo ou diretório.

### Tabelas
    - users;
    - roles
    - permissions
    - permissions_role
    - role_user

### Relacionamentos

A tabela "users" tem um relacionamento muitos-para-muitos com a tabela "roles" através da tabela "role_user". Um usuário pode ter várias funções e uma função pode ser atribuída a vários usuários.

A tabela "roles" também tem um relacionamento muitos-para-muitos com a tabela "permissions" através da tabela "permissions_role". Uma função pode ter várias permissões e uma permissão pode ser atribuída a várias funções.
