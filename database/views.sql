----- QUERY AREAS ------

CREATE VIEW vista_areas AS

SELECT CASE
        WHEN (nombre_area_p IS NULL OR nombre_area_p = '') AND (nombre_area_h IS NULL OR nombre_area_h = '') THEN ''
        ELSE CONCAT(
            codigo,
            CASE
                WHEN nombre_area_p IS NOT NULL AND nombre_area_p != '' THEN CONCAT(' - ', nombre_area_p)
                ELSE ''
            END,
            CASE
                WHEN nombre_area_h IS NOT NULL AND nombre_area_h != '' THEN CONCAT(' - ', nombre_area_h)
                ELSE ''
            END
        )
    END AS info_completa
FROM tbl_areas ta;


------ QUERY CAMPOS --------

CREATE VIEW vista_campos AS

SELECT CONCAT(codigo,' - ',nombre_campo) AS info_completa
FROM tbl_campos cp;