# SQL

![](images/sql-diagram.png)

## 1. Query

Based on the SQL diagram above, write the following queries:

**A.** Get authors with a last name beginning with "M" or who are born after 1950.

**Answer:**
```mysql
select author.first_name, author.last_name from author 
where last_name like 'M%' 
and birth_date >= '1950-01-01' 
and birth_date < '1951-01-01'
```

**B.** Count the number of books per category (empty categories too).

**Answer:**
```mysql
select c.name, count(b.id) 
from book b 
left join category c on c.id = b.category_id 
group by c.name

```

**C.** Find authors who wrote at least 2 books.

**Answer:**
```mysql
select a.first_name, a.last_name from author a left join book b on b.author_id = a.id
group by a.first_name, a.last_name
having count(*) >= 2;

```

**D.** Get 50 authors with at least one event between the start and the end of this year.

**Answer:**
```mysql
select a.last_name, a.first_name from author_event ae 
left join author a on a.id = ae.author_id
where ae.event_id in ( 
select id from event where event.date between '2020-01-01' and '2021-01-01')
group by a.last_name, a.first_name
limit 50;

```

**E.** Get the average number of books written by authors.

**Answer:**
```mysql
select first_name, avg(book_number) from (
select   a.first_name as first_name, COUNT(*) as book_number
from     author a
join     book b ON a.id = b.author_id
group by a.first_name
) as author_book group by first_name;
```

**F.** Get authors, sorted by the date of their **latest** event.

**Answer:**
```mysql
select author_name, date 
from ( 
	select a.first_name as author_name, max(e.date) as date
	from author a
	inner join author_event ae on ae.author_id = a.id
	inner join event e on e.id = ae.event_id
	group by a.first_name) as author_event_list
order by date desc
```

## 2. Database Structure

**A.** Based on the SQL diagram above, what can be done to improve the performance of this query ?

```mysql
SELECT id, name FROM book WHERE YEAR(published_date) >= '1973';
```

**Answer:** Put an index on published_date field, don't use prebuild function on YEAR


**B.** Give 3 common good practice on a database structure to optimize queries.

**Answer:** 
 - Put indexes on most queried field
 - Do not use * on select if all fields are not used
 - Avoid usage of functions if an another way is possible

Bonus : use Explain or Explain Analyze to study the query plain.
