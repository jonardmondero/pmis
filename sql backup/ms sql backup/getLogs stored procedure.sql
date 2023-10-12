CREATE PROCEDURE GetLogs
@PIN INT,@YEAR NVARCHAR(50),@MONTH NVARCHAR(50), @DAY NVARCHAR(50)
AS
SELECT distinct top 20 checktype,checktime,badgenumber,sn from ViewLogs  where
badgenumber = @PIN and  DATEPART(yy,checktime)= @YEAR 
AND datepart(mm,checktime) = @MONTH and datepart(dd,checktime)= @DAY
ORDER BY checktime


EXEC GetLogs @PIN = 9989 , @MONTH = '10', @YEAR = '2022', @DAY = '05';