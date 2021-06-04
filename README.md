# LBAW's framework

- Docker commands:

```
    docker login
    DOCKER_USERNAME=lbaw2125 # Replace by your Docker Hub username
    IMAGE_NAME=lbaw2125     # Replace by your LBAW group name
    ./upload_image.sh
    docker run -it -p 8000:80 -e DB_DATABASE="lbaw2125" -e DB_USERNAME="lbaw2125" -e DB_PASSWORD="QO910115" lbaw2125/lbaw2125
    docker run -it lbaw2125/lbaw2125 bash
```

<!-- 
    docker login
    DOCKER_USERNAME=johndoe # Replace by your Docker Hub username
    IMAGE_NAME=lbaw21gg     # Replace by your LBAW group name
    ./upload_image.sh
    docker run -it -p 8000:80 -e DB_DATABASE="lbaw21gg" -e DB_USERNAME="lbaw21gg" -e DB_PASSWORD="PASSWORD" <DOCKER_USERNAME>/lbaw21gg
    docker run -it lbaw21gg/lbaw21gg bash

 -->

- Product running location : http://lbaw2125.lbaw-prod.fe.up.pt/ (feup vpn is needed)

# Credentials

| Type          | Username  | Password |
| ------------- | --------- | -------- |
| basic account | super_tga    | qwertyuiop |
| basic account | robert    | ihateanime |
|  banned  |  dreamer   | veracidade11 |
| admin | janeDoe    | blindspot |
| admin | alanYo    | arrozdefrango |

> More credentials can be found [in this file](resources/sql/populate.sql). Username is first entry in each row and password is commented at the end.


| Name                      | Number    | E-Mail               |
| ------------------------- | --------- | ------------------   |
| Luís Miguel Pinto         | 201806206 | up201806206@edu.fe.up.pt |
| Nuno Oliveira             | 201806525 | up201806525@edu.fe.up.pt |
| Marcelo Reis             | 201809566 |  up201704093@edu.fe.up.pt |

