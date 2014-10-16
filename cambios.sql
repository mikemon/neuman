CREATE TABLE "precioCombustible"
(
  id bigserial NOT NULL,
  descripcion character varying(90) NOT NULL,
  precio double precision NOT NULL,
  "usuarioInsert_id" bigint NOT NULL,
  "usuarioEdit_id" bigint,
  created_at timestamp without time zone NOT NULL,
  updated_at timestamp without time zone NOT NULL,
  PRIMARY KEY (id)
)


tipoCombustible_id

ALTER TABLE "tipoCarro" ADD COLUMN "precioCombustible_id" bigint;

ALTER TABLE "datoRendimiento" ADD COLUMN carro_id bigint;
ALTER TABLE "datoRendimiento" ALTER COLUMN carro_id SET NOT NULL;