.MODEL SMALL
.STACK 100H
.DATA
PROC1 DB 'Hi, I am from Main Procedure $'
PROC2 DB 0AH,0DH,'Hi, I am from Second Procedure $'
PROC3 DB 0AH,0DH,'Hi, I am from Third Procedure $'
.CODE

MAIN PROC
    MOV AX,@DATA
    MOV DS,AX
    
    CALL PROCEDURE1
    CALL PROCEDURE2
    CALL PROCEDURE3
    JMP EXIT    

PROCEDURE1 PROC
    LEA DX,PROC1
    MOV AH,9
    INT 21H
    RET
    
PROCEDURE2 PROC
    LEA DX,PROC2
    MOV AH,9
    INT 21H
    RET
    
PROCEDURE3 PROC
    LEA DX,PROC3
    MOV AH,9
    INT 21H
    RET

EXIT:
MOV AH,4CH
INT 21H
PROCEDURE3 ENDP
END  MAIN