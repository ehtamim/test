.MODEL SMALL
.STACK 100h
.DATA

MSG DB 'E$'
MSG1 DB 0AH,0DH,'M$'
MSG2 DB 0AH,0DH,'A$'
MSG3 DB 0AH,0DH,'M$'

.CODE

MAIN PROC

MOV AX,@DATA
MOV DS,AX
  
LEA DX, MSG
MOV AH, 9
INT 21h

LEA DX, MSG1
MOV AH, 9
INT 21h
           
LEA DX, MSG2
MOV AH, 9
INT 21h

LEA DX, MSG3
MOV AH, 9
INT 21h


Exit:
MOV AH,4CH
INT 21h


MAIN ENDP
END MAIN