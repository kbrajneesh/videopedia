@echo off
for /R %%i in (*.mp4) do (
If Not Exist ./images/poster/%%~ni.jpg (
mplayer -ss 1 "%%i" -frames 1 -nosound -vo jpeg:outdir=.\images\poster
ren .\images\poster\00000001.jpg "%%~ni.jpg"
)
)
pause