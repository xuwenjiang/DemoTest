# PHP-test

clone 到本地，执行：
docker-compose up -d

访问：
and go http://127.0.0.1:8090/

进入container中，
执行 vendor/phpunit/phpunit/phpunit tests/testEvent.php 感受测试

试图修改 src\Event\JackGoesToShaxianForChickenRice.php 代码后，看测试是否还能通过？

执行  vendor/phpunit/phpunit/phpunit  --coverage-html report/ --no-configuration --whitelist App/ tests/testEvent.php
可以感受测试覆盖（只检查App/文件夹下的覆盖）
覆盖结果生成再src/report下，用浏览器打开index.html


测试完毕后，关掉这个
docker-compose down 