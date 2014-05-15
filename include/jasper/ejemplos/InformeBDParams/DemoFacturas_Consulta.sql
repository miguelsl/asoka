SELECT DISTINCT e.anyo as "anyo",
e.nfactura as "nfactura", 
CASE WHEN procedencia='C' THEN 'COMPRA' ELSE 'DONACION' END as "procedencia", 
e.cif as "cif",
e.orden as "orden", 
CASE WHEN procedencia='C' THEN p.nombre ELSE d.nombre END as "nombre", 
(select ddg from tcom_dirgral WHERE tcom_dirgral.cdg = e.cdg) as "dg",
e.fadquisicion as "fadquisicion",
e.factura as "codFactura",
SELECT sum(l.coste) FROM tinv_lineas l WHERE l.anyo = $P{Anyo} AND  l.nfactura = e.nfactura
FROM tinv_entradas e LEFT JOIN tinv_donantes d ON (e.procedencia = 'T' AND d.cif = e.cif AND d.orden = e.orden) LEFT JOIN tcom_proveed p ON (e.procedencia = 'C' AND p.nif = e.cif AND p.orden = e.orden)