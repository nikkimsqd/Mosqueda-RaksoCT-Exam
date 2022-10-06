1. 
SELECT ProductName, QuantityPerUnit FROM products;

2. 
SELECT ProductID, ProductName FROM products WHERE Discontinued != 0;

3. 
SELECT ProductName, UnitPrice FROM products WHERE Discontinued != 0 ORDER BY UnitPrice DESC;

4. 
SELECT ProductName, UnitPrice FROM products WHERE UnitPrice > (SELECT AVG(UnitPrice) FROM products);

5. 
SELECT ProductID, ProductName, UnitPrice WHERE UnitPrice < 20 AND Discontinued != 0;

6. 
SELECT ProductID, UnitsOnrder, UnitsInStock WHERE UnitsInStock < UnitsOnrder AND Discontinued != 0;

