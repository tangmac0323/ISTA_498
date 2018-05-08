SELECT * 
FROM CustOrder 
WHERE userName:=username 
AND 
orderID = (SELECT MAX(orderID) 
					FROM CustOrder 
				WHERE username='a@hotmail')