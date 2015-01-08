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


/***************2014***********/

CREATE TABLE "ordenServicio"
(
  id bigserial NOT NULL,
  serfol character varying(2) NOT NULL,
  numfol bigint NOT NULL,
  numagt character varying(5),
  numcte character varying(18),
  chasis character varying(40),
  cvemov character varying(3),
  fventa timestamp without time zone,
  fingreso timestamp without time zone,
  hora time with time zone,
  fsalida timestamp without time zone,
  hsalida time with time zone,
  torre character varying(20),
  fallareportada text,
  estado character varying(30),
  observaciones text,
  tipoventa character varying(10),
  pass character varying(100),
  cveaseguradora character varying(5),
  numalm character varying(2),
  nummovca bigint,
  fechatermino timestamp without time zone,
  cvearea character varying(5) NOT NULL,
  cveareaact character varying(5) NOT NULL,
  edoenvio bigint DEFAULT 1,
  updated_at timestamp without time zone,
  created_at timestamp without time zone,
  carro_id bigint NOT NULL,
  "datoRendimiento_id" bigint,
  PRIMARY KEY (id),
  FOREIGN KEY (carro_id)
      REFERENCES carros (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY ("datoRendimiento_id")
      REFERENCES "datoRendimiento" (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
;
CREATE TABLE "ordenServicio_servicio"
(
  id bigserial NOT NULL,
  servicio_id bigint NOT NULL,
  "ordenServicio_id" bigint NOT NULL,
  observacion character varying(300) NOT NULL,
  subtotal double precision NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY ("ordenServicio_id")
      REFERENCES "ordenServicio" (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (servicio_id)
      REFERENCES servicio (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);