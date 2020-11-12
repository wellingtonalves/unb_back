-- REDMINE: #19819 - (https://cgead.enap.gov.br/issues/19819)
drop table tb_perfil_permissao;
create table tb_perfil_permissao
(
    id_perfil_permissao serial not null
        constraint tb_perfil_permissao_pk
            primary key,
    id_perfil int not null
        constraint tb_perfil_permissao_tb_perfil_id_perfil_fk
            references tb_perfil,
    id_permissao int not null
        constraint tb_perfil_permissao_tb_permissao_id_permissao_fk
            references tb_permissao,
    created_at timestamp,
    updated_at timestamp,
    deleted_at timestamp
);



-- REDMINE: #20024 - (https://cgead.enap.gov.br/issues/20024)
alter table tb_oferta alter column dt_inicio_inscricao drop not null;
alter table tb_oferta alter column dt_termino_inscricao drop not null;

-- REDMINE: #20029 (https://cgead.enap.gov.br/issues/20029)
alter table tb_programa alter column bl_programa_destaque set default 0;
