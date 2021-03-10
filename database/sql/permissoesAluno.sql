INSERT INTO tb_perfil_permissao (id_perfil, id_permissao, created_at, updated_at, deleted_at)
VALUES (2, (SELECT id_permissao FROM tb_permissao WHERE tx_nome_permissao = 'ALUNO_INSCRICOES_LISTAR'), current_date, current_date);

INSERT INTO tb_perfil_permissao (id_perfil, id_permissao, created_at, updated_at, deleted_at)
VALUES (2, (SELECT id_permissao FROM tb_permissao WHERE tx_nome_permissao = 'INSCRICAO_CURSOS_ALUNO'), current_date, current_date);

INSERT INTO tb_perfil_permissao (id_perfil, id_permissao, created_at, updated_at, deleted_at)
VALUES (2, (SELECT id_permissao FROM tb_permissao WHERE tx_nome_permissao = 'CERTIFICADO_LISTAR'), current_date, current_date);

INSERT INTO tb_perfil_permissao (id_perfil, id_permissao, created_at, updated_at, deleted_at)
VALUES (2, (SELECT id_permissao FROM tb_permissao WHERE tx_nome_permissao = 'UF_LISTAR'), current_date, current_date);

INSERT INTO tb_perfil_permissao (id_perfil, id_permissao, created_at, updated_at, deleted_at)
VALUES (2, (SELECT id_permissao FROM tb_permissao WHERE tx_nome_permissao = 'ORGAO_LISTAR'), current_date, current_date);

INSERT INTO tb_perfil_permissao (id_perfil, id_permissao, created_at, updated_at, deleted_at)
VALUES (2, (SELECT id_permissao FROM tb_permissao WHERE tx_nome_permissao = 'MUNICIPIO_LISTAR'), current_date, current_date);

INSERT INTO tb_perfil_permissao (id_perfil, id_permissao, created_at, updated_at, deleted_at)
VALUES (2, (SELECT id_permissao FROM tb_permissao WHERE tx_nome_permissao = 'UF_DETALHAR'), current_date, current_date);

INSERT INTO tb_perfil_permissao (id_perfil, id_permissao, created_at, updated_at, deleted_at)
VALUES (2, (SELECT id_permissao FROM tb_permissao WHERE tx_nome_permissao = 'PAIS_LISTAR'), current_date, current_date);

INSERT INTO tb_perfil_permissao (id_perfil, id_permissao, created_at, updated_at, deleted_at)
VALUES (2, (SELECT id_permissao FROM tb_permissao WHERE tx_nome_permissao = 'INSCRICAO_INCLUIR'), current_date, current_date);
