# Class-Assignment---Authorization

For this authorization assignment, I have put the authorization configuration where certain user have certain function like for admin, they can interact with a full function in the website where which I have created it special page [admin_index.php](admin_index.php). They can view all the data in the database and making any changes for the data like edit, delete and update the database. For the user, they can only view their data only on [user_record.php](user_record.php) and making of update and delete the data. The user cannot see and interact with other users data.

This is the user page, where users can submit, edit and delete their data only:

First User:
![image](https://github.com/hyzo70/Authorization/assets/122088412/d6857450-ea4f-444e-9cdf-ce73a53d209f)
![image](https://github.com/hyzo70/Authorization/assets/122088412/76338cb8-a464-4f21-a2a3-6294d59d0135)

Second User:
![image](https://github.com/hyzo70/Authorization/assets/122088412/6daef011-49e4-40e3-8159-51a06596b49d)
![image](https://github.com/hyzo70/Authorization/assets/122088412/208eb58c-8756-4618-8b2d-67ed73fa4b8d)

For admin, they can see all the data in the database:
![image](https://github.com/hyzo70/Authorization/assets/122088412/f5f84ca5-9e51-4e0a-b4aa-ef6598df39ca)
![image](https://github.com/hyzo70/Authorization/assets/122088412/53fccdbc-d047-4907-a589-ff33dd40c684)

The session function also been used where I have put start session and destroy session data during logout [logout.php](logout.php).

I have also sanitized all the user input to avoid any SQL injection occurred in the client side.
