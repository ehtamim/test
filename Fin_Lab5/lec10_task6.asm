.MODEL SMALL
.STACK 100H
.DATA
STRING1 DB 'PLEASE USER ENTER A SMALL LETTER: $'
STRING2 DB 0AH,0DH,'IN CAPITAL: $'
.CODE

MAIN PROC
    MOV AX,@DATA
    MOV DS,AX
    
    LEA DX,STRING1
    MOV AH,9
    INT 21H
    MOV AH,1
    INT 21H
    MOV BL,AL
    
    CALL TASK
    JMP EXIT      

TASK PROC
    LEA DX,STRING2
    MOV AH,9
    INT 21H
    AND BL,11011111B
    MOV AH,2
    MOV DL,BL
    INT 21H
    
    RET

EXIT:
MOV AH,4
INT 21H
TASK ENDP
END  MAIN