ʵ��ORCALE RANKORDER.
��������һ�ű� ����Ϊ A�� 
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

��������Ҫ���½���� 

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
               
 OVER(PARTITION BY column_name1 ORDER BY column_name2) �÷� �� ROW_NUMBER\RANK\DENSE_RANK������
���ࣺ ���ݿ� 2012-11-05 14:06 390���Ķ� ����(1) �ղ� �ٱ�
sql

/*�������Ա�*/

CREATE TABLE [dbo].[t1](
 [a] [nchar](10) NULL,
 [b] [nchar](10) NULL,
 [c] [nchar](10) NULL
) ON [PRIMARY]

--����һ�²�������
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

 

 --��aֵ��ͬ��������ǰ���б�� ROW_NUMBER() OVER(PARTITION BY a ORDER BY a) 
/*
��������(PARTITION BY)
���ڼ���������ĳ�־ۺ�ֵ�����;ۺϺ����Ĳ�֮ͬ���ǣ�����ÿ���鷵�ض��У����ۺϺ�������ÿ����ֻ����һ�С�
��������(order by)
ָ���˷����������������ݴ��ڴ�С��������ݴ��ڴ�С���ܻ������еı仯���仯��
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
2.rank()��dense_rank()���Խ����еĶ����ҳ�����
���Ͽ��Կ�������rank���Խ����е�һ���Ķ����ҳ�����
rank()��dense_rank()����
--rank()����Ծ������������һ��ʱ���������ǵ�������
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
               
               
               
               
               
               
               
       