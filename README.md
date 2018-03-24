Yii 1.1.19 <br/>

###Pages:
1. [main](http://intita.com/) - http://intita.com/ <br/>
2. [lecture](http://intita.com/course/ua/php/intro/1) - http://intita.com/course/ua/php/intro/1 <br/>
3. [teacher profile](http://intita.com/teacher16/) - http://intita.com/teacher16/ <br/>
4. [extended registration](http://intita.com/studentreg) - http://intita.com/studentreg<br/>
5. [teachers](http://intita.com/teachers) - http://intita.com/teachers <br/>
6. [courses](http://intita.com/courses) - http://intita.com/courses <br/>
7. [course](http://intita.com/course/ua/php) - http://intita.com/course/ua/php <br/>
8. [about us](http://intita.com/aboutus) - http://intita.com/aboutus  <br/>
9. [user profile](http://intita.com/studentreg/profile/?idUser=22) - http://intita.com/studentreg/profile/?idUser=22  <br/>
10. [user profile edit](http://intita.com/studentreg/edit) - http://intita.com/studentreg/edit  <br/>
11. [graduates](http://intita.com/graduate) - http://intita.com/graduate <br />
12. [forum](http://intita.com/forum/) - http://intita.com/forum/ <br />

###Admin pages
1. [IntITA CMS] (http://intita.com/cabinet) - http://intita.com/cabinet  <br/>

###PHP Extensions
1. mcrypt <br/>
2. mbstring <br/>
3. imap <br/>
4. xml <br/>
5. zmq <br/>

###Deploy/Installation
 1. Install PHP with extensions<br/>
 2. Install and configure Nginx/Apache <br/>
 3. Install bower and composer <br/>
 4. Go to the directory PROJECT_PATH/angular <br/>
 5. Run 'bower install' ('bower install --allow-root' if needed )  <br/>
 6. Go to the directory PROJECT_PATH/protected <br/>
 7. Run 'composer install' <br/>
 8. Make directories PROJECT_PATH/assets, PROJECT_PATH/runtime PROJECT_PATH/protected/runtime
 
 If needed unpack example content from example_content archive 

###Docker support
  1. Install Docker and Docker-compose<br/>
  2. Copy .env-<br/>
  2. Run 'docker-compose up'
  3. 

###Nginx Configuration for projects
 location ~* ^/(test|projects)/{
             index index.html index.htm;
         }
         location ~* ^/(test|projects)/.+\.(php|php3|php4|php5|phtml|phps|pl|pm)$ {
             deny all;
         }
