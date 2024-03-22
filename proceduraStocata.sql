
CREATE PROCEDURE GetMinMaxQuantityForComponent(
    IN component_id VARCHAR(10),
    OUT min_quantity INT,
    OUT max_quantity INT
)
BEGIN
    SELECT MIN(CANTITATE) INTO min_quantity
    FROM LIVRARI
    WHERE IDC = (SELECT IDC FROM COMPONENTE WHERE IDC = component_id);

    SELECT MAX(CANTITATE) INTO max_quantity
    FROM LIVRARI
    WHERE IDC = (SELECT IDC FROM COMPONENTE WHERE IDC = component_id);
END 


