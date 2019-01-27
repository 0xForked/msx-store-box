Reuqirement

- Docker
- Laradock

How to use?
- Clone this repo
- Add ngix sites in laradock/nginx/sites (make new file msx-gateway.conf, msx-bookservice.conf, etc)
- open terminal and edit /etc/hosts and add host name
- Run laradock (docker-compose up -d nginx mysql workspace)
- check your site is available or not (open browser and go to the app links)
- done now you are doing a new arch

Problem with Docker Image in Laradock
-Mysql

-Nginx
defaul.conf change /var/www/public to /var/www

-akses nginx hosts/sites from other pc in same network just do
 windows 10: edit \Windows\System32\drivers\etc\hosts
 linux \etc\hosts
 link di facebook terakhir

### License

msx-box is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
