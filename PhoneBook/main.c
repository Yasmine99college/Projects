#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct
{
 int day;
 int month;
 int year;

}contact_birthdate;

typedef struct
{
  char first_name[20];
  char last_name[20];
  contact_birthdate birthdate;
  char address[50];
  char email[30];
  char phone_number[20];
}contact;

contact myarr[100];
int count=0;


#include "load.h"
#include "search.h"
#include "add.h"
#include "remove.h"
#include "edit.h"
#include "display.h"
#include "save.h"


int main()
{
    int choice;
    load_contacts();
    printf("\t Welcome to your phonebook \n");
    while(1)
    {
        printf("\n\n");
        printf("Enter the number of your choice \n");
        printf("1)Add new contact\n");
        printf("2)Search for an existing contact\n");
        printf("3)Delete an existing contact\n");
        printf("4)Edit contact\n");
        printf("5)Display all contacts\n");
        printf("6)Exit\n");
        printf("Your choice: ");

        scanf("%d",&choice);

        if (choice==6)
        {
           printf("\nProgram closed\n");
            break;
        }

        switch(choice)
        {
            case 1: printf("\t Add new contact\n");addcontact();break;
            case 2: printf("\t Search for an existing contact\n");search_contacts();break;
            case 3: printf("\t Delete an existing contact\n");remove_contact();break;
            case 4: printf("\t Edit contact");edit_contact();break;
            case 5: printf("\t Display all contacts");print_bubblesort();break;
            default: printf("Selection out of range");break;
        }

        save_arr_to_file();

    }

    return 0;
}

