SELECT email FROM users;
--works!!
SELECT email, name FROM users ORDER BY name DESC;
--works!!
SELECT email FROM users WHERE email = 'given';
--won't return if there isn't an entry, returns that email if there is, which could be used as a warning
--warning that email exists....
INSERT INTO users (email, password, name) VALUES ('test', 'test', 'test');
--won't return any value, other than "QUery OK, 1 row affected"
SELECT password FROM users WHERE name = 'test';
SELECT name FROM users WHERE email LIKE '%test';