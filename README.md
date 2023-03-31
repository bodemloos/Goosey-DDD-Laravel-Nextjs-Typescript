# nextjs.ontheloose.io
### Domain Driven Design - NextJs - Laravel - TypeScript

1. [Installation](#installation)
2. [Tech Stack](#tech)
   1. [server stack](#server)
   2. [api stack](#api)
   3. [frontend stack](#frontend)
3. [Policy](#policy)
   1. [code policy](#code)
   2. [git policy](#git)
4. [Roles](#roles)
5. [Deployment](#deployment)

## Installation <a name="installation"></a>
#### copy .env.example to .env and update environment variables:

 - project root folder
 - api folder
	 - *JWT_SECRET* = 256-bit encryption key

#### run following command to init and run the docker containers:
```
make init
```
#### next time run following command to prevent losing your data:
```
make up
```
#### stop your running containers:
```
make down
```
##### everything is build with docker & docker-compose to prevent overhead for deployment and server setup:
   

## Tech stack:<a name="tech"></a>
 ### Everything runs on the latest stable version (2023-04-01):
#### 2.1 Server stack:<a name="server"></a>
##### PHP version 8.2   
 - released on 06 Dec 2022
 - active support until 08 Dec 2024
 - security support until 08 Dec 2025

##### MariaDB version 10.6.12 
 - released on 06 feb 2023
 - current long-term maintenance on stable verison of MariaDB

##### NodeJS version 18 (LTS) 
- released on 19 Apr 2022
- active support until 18 Oct 2023
- security support until 30 Apr 2025

##### NGINX version 1.23 
- webserver & reverse-proxyserver for HTTP-, SMTP-, POP3- en IMAP-protocols,
 - released on 21 Jun 2022
 - security support until ...

#### 2.2 Api/Backend stack:<a name="api"></a>
##### Laravel version 10.4.2
- released on 07 feb 2023
- bug fixes until 07 aug 2024
- security fixes until 07 feb 205
- #### service-Repository design pattern:      
	- repositories
		- layer for read operations.
    - services
	    - layer for executing create, update and delete CRUD operations

#### 2.3. Frontend stack:<a name="frontend"></a>
##### NextJs version ...
- released on ...
- active support until ...
- security support until ...

#### SASS version 1.60

### 3. Policy during development:<a name="policy"></a>
#### 3.1 Clean-code policy: <a name="code"></a>
- Prettier Code formatter
	- https://prettier.io/
    - format code on save
    - no useless discussions on code reviews     
- PHP formatter from DEVSENSE v1.31.12821 for PHP formatting
- ESLint
      
#### 3.2 GIT policy: <a name="git"></a>
- "master" branch is protected and can't be pushed at without a pull request and code review
- I use 'tig' in my terminal to add or remove changes

### 4. Roles & Permission: <a name="roles"></a>
##### Laravel-Permission package "Spatie" to handle roles and permissions in Laravel.
   - added 2 roles:
	- admin
       	- user

##### Observer pattern to give a new user the default 'user' role

### 5. Deployment on Google Cloud Platform:<a name="policy"></a>
- Google Cloud Engine:
	- VM instance on GGE.

#### Thanks to docker it only takes a few minutes to create this instance for the first time.
  
