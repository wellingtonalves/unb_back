ALTER TABLE tb_ava ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_curso ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_inscricao ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_oferta ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_orgao ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_parceiros ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_perfil ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_perfil_permissao ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_permissao ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_pessoa ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_programa ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_tarefa_agendada ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_tematica_curso ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_usuario ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_modelo_certificado ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_municipio ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_pais ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_situacao_usuario ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_tipo_oferta ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_unidade_federacao ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_exclusividade_oferta ADD COLUMN deleted_at timestamp(0);
ALTER TABLE tb_valor_exclusividade_oferta ADD COLUMN deleted_at timestamp(0);