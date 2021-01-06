# PHP代码规范

### 一、Controller命名规范

1, 首字母大写,其余小写；

```php
    class Controller {

    }







```

2, 对应数据库名称. 不要下划线；

```php
    xyhuyu






```

3, 方法名 驼峰. 首字母小写；

```php
    public function memberInfo() {
	
    }






```

4, 通用方法名称 index, add, edit, delete, lists, info；

```php
    /* 首页 */
    public function index() {
    
    }
    /* 新增 */
    public function add() {
    
    }
    /* 修改 */
    public function edit() {
    
    }
    /* 删除 */
    public function delete() {
    
    }
    /* 列表 */	
    public function lists() {
    
    }	
    /* 详情 */	
    public function info() {
    
    }






```

5,注释: 不能太多, 按功能代码块: 简单注释；

```php
    /**
     * 函数体简单的描述
     * @author : 作者
     * @param string : $id    描述
     * @param array : $array 描述
     * @param array : $num  描述
     * @return : 返回值说明
    */
    function Test($id, $array = array(), $num = 1){
    
    }




```

6、空行: 不同的代码块,可空一行区分开. 不能空多行；

```php
    $str = 1;
    $info = '123';
    $version = '123123';
    $name = 'test';
    $i  = 'haha';
      
    # 一般在最外部的if 或流程控制语句都应该上下留空一行
    if ($info) {
      
    }
      
    # 一般在最外部的for或者 foreach都应该上下留空一行
    for ($i=0 ,$i<6 ,$i++){
      
    }




```

7、sql: 长sql , 要sql美化；

```php
    $list = db('member')->where($where)
        ->field('id, nickname, avatar, phone, created_at')
        ->order('sort', 'desc')
        ->order('id', 'desc')
        ->limit($pre . ',' . $rows)
        ->select();





```

8、缩进: 代码块,缩进分明；

```php
    <?php // 开头必须使用 <?php

        class CodingStandard { // 大括号前面加空格，类名开头字母大写，多个字母首字母大写
            private $attribute; // 属性注释直接注释在后方

            // 数组格式
            public $color = array(
                '1' => 'red', // 用tab缩进一次
                '2' => 'blue',
                '3' => 'yellow',
                '4' => array(
                    '1' => 'green', // 在前面的数组对齐列之后再tab缩进一次
                    '2' => 'gray'
                ) // 数组的结尾与声明的变量最前面对齐
            ); // 数组的结尾与数组变量声明的地方对齐

            public $number = array(1, 2, 3, 4); // 对于简单数组，可以放一行

            // 方法的注释采用双斜线，尽量在一行内完成
            function foo($i, $list) { // 1.function名后面的(前面没有空格 2.多个参数，如果有逗号，那么逗号后面要有空格
                for ($j = 0; $j < $i; $j++) { // for后面加空格
                    echo "This is no.{$j}, content is {$list[$j]}"; // echo语句不加括号。

                    // echo语句里面用单引号还是双引号，根据实际情况定
                    echo '&lttable border="0" cellspacing="5" cellpadding="5"&gt'; 
                }
                if ($i > 0) { // 1.if后面加空格 2.操作符前后都要有空格
                    return $i % 2; // 操作符前后是有空格的
                } else { // else前后也要有空格
                    return null;
                }

                if ($j == $i) return 1; // if里面只有一句语句且较短的情况，建议写成一行，如果要拆成多行，则前后建议加上括号。

                $count = count($_SERVER); // 在外面写赋值
                if ($count > 10) echo 'pass'; // if里面只做布尔判断，不要写赋值语句
            }

            public static function testFunction() { // 静态非静态方法命名都遵守驼峰原则
            }
        }

        $s = new CodingStandard(); // new一个对象，后面必须加括弧
        $s->foo(10, $s->color); // 函数后面的括弧不要有空格，函数里面超过一个参数，逗号后面就要有空格
        CodingStandard::testFunction(); // 静态代码的调用方式唯一，仅限双冒号调用方式

    ?> // php文件必须以?>结尾，并且保证其后面没有空格或空行。




```

9, 变量命名

1)简短常见；

```php
    $rs, $res, $result,$info, $lists





```

2)模型 直接用函数标识, 不要中间变量；

```php
    $memberModel, $adminModel





```

3)前缀区分；

```php
    $member_data, $admin_data
    






```

二、程序流程

```
1)验证参数；
2)格式化参数；
3)简单的入库, 修改和查询 直接调用db；
4)复用的, 逻辑复杂的. 一定要写model；
5)查询不要写model. 除非很多复用的地方；
6)涉及图片处理的. 注意要调用底层图片处理类；







```

三、Model命名规范

1)首字母大写, 驼峰；

```php
    class Member(){
    
    }






```

2)对应数据库名称；

```php
    class Member(){
    
    }





```

3)方法的颗粒度要合适. 不能大而全, 也不能太小导致数据多次查询；

四、程序流程

```
1)参数要顾名思义；
2)尽量考虑扩展和通用；
3)涉及权限的, 一定要验证. 防止越权；
4)统一错误处理方式；
5)统一失败返回false；
五、命名原则
1)简短,常用的单词；
2)类名已表达了的意思, 方法名不要重复；
3)关键词, 可以加s 避开关键词；





```

# MySQL命名规范及使用技巧

一、命名规范

```
1、库名、表名、字段名必须使用小写字母，并采用下划线分割
1)MySQL有配置参数lower_case_table_names，不可动态更改，Linux系统默认为0，即库表名以实际情况存储，大小写敏感。
如果是1，以小写存储，大小写不敏感。如果是2，以实际情况存储，但以小写比较；
2)如果大小写混合使用，可能存在abc、Abc、ABC等多个表共存，容易导致混乱；
3)字段名显示区分大小写，但实际使⽤用不区分，即不可以建立两个名字一样但大小写不一样的字段；
4)为了统一规范， 库名、表名、字段名使用小写字母；
2、库名、表名、字段名禁止超过32个字符，库名、表名、字段名支持最多64个字符，
	但为了统一规范、易于辨识以及减少传输量，禁止超过32个字符；
3、库名、表名、字段名禁止使用MySQL保留字，当库名、表名、字段名等属性含有保留字时，
	SQL语句必须用反引号引用属性名称，这将使得SQL语句书写、SHELL脚本中变量的转义等变得⾮非常复杂；


```

二、使用技巧

```
1、将大字段、访问频率低的字段拆分到单独的表中存储，分离冷热数据，有利于有效利用缓存，
	防⽌止读入无用的冷数据，较少磁盘IO，同时保证热数据常驻内存提⾼高缓存命中率；
2、表必须有主键，推荐使用UNSIGNED自增列作为主键，表没有主键，INNODB会默认设置隐藏的主键列，
	没有主键的表在定位数据行的时候非常困难，也会降低基于行复制的效率；
3、禁止冗余索引和重复索引，索引是双刃剑，会增加维护负担，增大IO压力。(a,b,c)、(a,b)，
	后者为冗余索引可以利用前缀索引来达到加速目的，减轻维护负担。primary key a；uniq index a；
	重复索引增加维护负担、占用磁盘空间，同时没有任何益处。
4、合理使用覆盖索引减少IO，避免排序，覆盖索引能从索引中获取需要的所有字段，从而避免回表进行二次查找，
	节省IO，INNODB存储引擎中，secondary index(非主键索引，又称为辅助索引、二级索引)没有直接存储行地址，
	而是存储主键值。如果用户需要查询secondary index中所不包含的数据列，则需先通过secondary index查找到主键值，
	然后再通过主键查询到其他数据列，因此需要查询两次。覆盖索引则可以在一个索引中获取所有需要的数据，
	因此效率较高。例如SELECT email，uid FROM user_email WHERE uid=xx，如果uid不是主键，
	适当时候可以将索引添加为index(uid，email)，以获得性能提升。


```