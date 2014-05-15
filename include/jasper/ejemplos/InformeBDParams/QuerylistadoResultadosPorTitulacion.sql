SELECT t1.*,COALESCE(t3.si,0) as "aptos",COALESCE(t5.no,0) as "noaptos",
tddm_titulacion.desctitcas,tddm_asignatura.descasigcas FROM 
(((((SELECT 
tddm_solicitud.codtit as "codtit",
tddm_solicitud.codasig as "codasig",
CAST ( tddm_solicitud.fecha_conv AS date ) as "fecha_conv",
count(*) as "cantidad"
FROM tddm_solicitud
WHERE tddm_solicitud.codtit = COALESCE($P{CodTit},tddm_solicitud.codtit)
AND tddm_solicitud.fecha_conv = COALESCE(CAST($P{FechaConv} AS date ),tddm_solicitud.fecha_conv)
GROUP BY tddm_solicitud.codtit,tddm_solicitud.fecha_conv,tddm_solicitud.codasig
) As t1
LEFT JOIN ( SELECT t2.codtit,t2.codasig,t2.fecha_conv,count(*) as "si"
	    FROM tddm_solicitud as t2
	    WHERE t2.nota='APTO' AND t2.codtit = COALESCE($P{CodTit},t2.codtit)
		AND t2.fecha_conv = COALESCE(CAST($P{FechaConv} AS date ),t2.fecha_conv)
	    GROUP BY t2.codtit,t2.fecha_conv,t2.codasig) as t3
ON t1.codtit=t3.codtit AND t1.codasig=t3.codasig AND t1.fecha_conv=t3.fecha_conv)
LEFT JOIN ( SELECT t4.codtit,t4.codasig,t4.fecha_conv,count(*) as "no"
	    FROM tddm_solicitud as t4
	    WHERE t4.nota='NO APTO' AND t4.codtit = COALESCE($P{CodTit},t4.codtit)
		AND t4.fecha_conv = COALESCE(CAST($P{FechaConv} AS date ),t4.fecha_conv)
	    GROUP BY t4.codtit,t4.fecha_conv,t4.codasig) as t5
ON t1.codtit=t5.codtit AND t1.codasig=t5.codasig AND t1.fecha_conv=t5.fecha_conv)
LEFT JOIN tddm_titulacion ON tddm_titulacion.codtit=t1.codtit)
LEFT JOIN tddm_asignatura ON tddm_asignatura.codasig = t1.codasig)
ORDER BY t1.codtit, t1.fecha_conv