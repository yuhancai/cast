实现ORCALE RANKORDER.
例如我有一张表 表名为 A： 
ID    SCORE 
1      28 
2      33 
3      33 
4      89 
5      99 
6      68 
7      68 
8      78 
9      88 
10    90 

现在我需要如下结果： 

ID    SCORE    RANK 
5      99              1 
10    90              2 
4      89              3 
9      88              4 
8      78              5 
6      68              6 
7      68              7 
2      33              8 
3      33              9 
1      28             10 

SELECT id,  
       score,  
       rank  
FROM (SELECT tmp.id,  
               tmp.score,  
               @rank := @rank + 1 AS rank  
          FROM (SELECT id,  
                       score  
                  FROM a  
                 ORDER BY score desc) tmp,  
               (SELECT @rank   := 0) a) RESULT; 
               
 OVER(PARTITION BY column_name1 ORDER BY column_name2) 用法 及 ROW_NUMBER\RANK\DENSE_RANK的区别
分类： 数据库 2012-11-05 14:06 390人阅读 评论(1) 收藏 举报
sql

/*建立测试表*/

CREATE TABLE [dbo].[t1](
 [a] [nchar](10) NULL,
 [b] [nchar](10) NULL,
 [c] [nchar](10) NULL
) ON [PRIMARY]

--插入一下测试数据
insert dbo.t1 values('1',          '1b',         NULL )
insert dbo.t1 values('1',          '2b',         NULL)
insert dbo.t1 values('1',          '3b',         NULL)
insert dbo.t1 values('1',          '4b',         NULL)
insert dbo.t1 values('2',          '1b',         NULL)
insert dbo.t1 values('2',          '2b',         NULL)
insert dbo.t1 values('3',          '1b',         NULL)
insert dbo.t1 values('3',          '2b',         NULL)
insert dbo.t1 values('3',          '3b',         NULL)
insert dbo.t1 values('4',          'b',          NULL)
insert dbo.t1 values('5',          '5b',         NULL)
insert dbo.t1 values('5',        '2b',         NULL)
insert dbo.t1 values('5',          '2b',         NULL)
insert dbo.t1 values('5',          '3b',         NULL )    

 

 --将a值相同的数据行前加行编号 ROW_NUMBER() OVER(PARTITION BY a ORDER BY a) 
/*
分析函数(PARTITION BY)
用于计算基于组的某种聚合值，它和聚合函数的不同之处是：对于每个组返回多行，而聚合函数对于每个组只返回一行。
开窗函数(order by)
指定了分析函数工作的数据窗口大小，这个数据窗口大小可能会随着行的变化而变化，
*/
select ROW_NUMBER() OVER(PARTITION BY a ORDER BY a ) AS RowNumber,a,b,c 
from t1
/*
1 5 5b NULL
2 5 2b NULL
3 5 2b NULL
4 5 3b NULL
*/


/*
2.rank()和dense_rank()可以将所有的都查找出来：
如上可以看到采用rank可以将并列第一名的都查找出来；
rank()和dense_rank()区别：
--rank()是跳跃排序，有两个第一名时接下来就是第三名；
*/
select rank() OVER(PARTITION BY a order by b ) AS RowNumber,a,b,c 
from t1
/*
1 5 2b NULL
1 5 2b NULL
3 5 3b NULL
4 5 5b NULL
*/

select DENSE_RANK() OVER(PARTITION BY a order by b ) AS RowNumber,a,b,c 
from t1
/*
1 5 2b NULL
1 5 2b NULL
2 5 3b NULL
3 5 5b NULL
*/               
               
               
               
               
               
               
               
       