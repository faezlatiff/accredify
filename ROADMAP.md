# Roadmap

## Basic Infrastructure

Personally, I felt that I wasn't exactly coding how Laravel intended it to be, as I am completely new to the framework. <br>
If I had more time to learn about the Laravel framework and to dedicate to this project, I would: </br>
- Improve the structure of verifyController.php by adhering to the Accredify Coding Standards. 
- Break down functions into smaller, more specific components for readability, scalability and debugging purposes.
- Implement Google API DNS Lookup
    - In the interest of time, I used the dns_get_record() function in PHP as it was more straightforward to use and thought that the Google API wasn't necessary for this assessment.
    - I believe the Google API has certain features such as improved reliability and returning more detailed information about the DNS records, which could be useful in future versions

## Future Features
If I had greater ownership of this project, I would consider implementing:
- The ability to accept more than just JSON files (i.e. pdf, jpeg, png)
- A rate-limiting feature to prevent attacks that involve making too many requests

