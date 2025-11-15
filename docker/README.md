<h4>MYSQL</h4>
<code>docker compose exec db bash</code> - увійти до БД образу. Далі зробили:
<ul>
<li><code>mysql -uroot -p</code></li>  
<li><code>use DB_NAME</code></li>
<li><code>\. /var/lib/mysql/dump.sql</code> - але перед цим треба скопіювати дамп у проект в папку /docker/db/databases/dump.sql</li>
</ul>
