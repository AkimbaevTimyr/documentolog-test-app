
1)  select e.name, e.salary, c.employeeId AS chiefId, c.name AS chiefName, c.salary as chiefSalary 
    from employees AS e JOIN employees AS c ON e.chiefId = c.employeeId 
    WHERE e.salary > c.salary;

2)  SELECT department, chiefId
    FROM employees
    GROUP BY department, chiefId
    HAVING COUNT(*) <= 3;

3) Первая нормальная форма - каждая ячейка содержит только одно значение, столбцы имеют уникальные имена

