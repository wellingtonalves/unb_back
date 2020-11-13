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


-- REDMINE: #20188 (https://cgead.enap.gov.br/issues/20188)
create table tb_tipo_exclusividade_oferta
(
    id_tipo_exclusividade_oferta serial not null
        constraint tb_tipo_exclusividade_oferta_pk
            primary key,
    tx_nome_tipo_exclusividade_oferta char(1) not null,
    tx_descricao_tipo_exclusividade_oferta varchar(200) not null,
    created_at timestamp(0),
    updated_at timestamp(0),
    deleted_at timestamp(0)
);

create unique index tb_tipo_exclusividade_oferta_tx_nome_tipo_exclusividade_oferta_uindex
    on tb_tipo_exclusividade_oferta (tx_nome_tipo_exclusividade_oferta);

insert into tb_tipo_exclusividade_oferta (tx_nome_tipo_exclusividade_oferta, tx_descricao_tipo_exclusividade_oferta, created_at, updated_at)
values ('E', 'E-mail', current_date, current_date);

insert into tb_tipo_exclusividade_oferta (tx_nome_tipo_exclusividade_oferta, tx_descricao_tipo_exclusividade_oferta, created_at, updated_at)
values ('C', 'CPF', current_date, current_date);

insert into tb_tipo_exclusividade_oferta (tx_nome_tipo_exclusividade_oferta, tx_descricao_tipo_exclusividade_oferta, created_at, updated_at)
values ('M', 'Misto - (é utilizado tanto para e-mail quanto CPF)', current_date, current_date);

alter table tb_exclusividade_oferta
    add deleted_at timestamp(0);

alter table tb_exclusividade_oferta
    add id_tipo_exclusividade_oferta int;

alter table tb_exclusividade_oferta
    add constraint tb_exclusividade_oferta_tb_tipo_exclusividade_oferta_id_tipo_exclusividade_oferta_fk
        foreign key (id_tipo_exclusividade_oferta) references tb_tipo_exclusividade_oferta;

update tb_exclusividade_oferta set id_tipo_exclusividade_oferta = 1, updated_at = current_date
where tp_tipo_exclusividade = 'E';

update tb_exclusividade_oferta set id_tipo_exclusividade_oferta = 2, updated_at = current_date
where tp_tipo_exclusividade = 'C';

update tb_exclusividade_oferta set id_tipo_exclusividade_oferta = 3, updated_at = current_date
where tp_tipo_exclusividade = 'M';

alter table tb_exclusividade_oferta drop column tp_tipo_exclusividade;

alter table tb_exclusividade_oferta alter column id_tipo_exclusividade_oferta set not null;
