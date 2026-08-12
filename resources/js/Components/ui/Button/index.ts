export enum BtnVariant{
Outline = "outline",
Primary = "primary",
Secondary = "secondary",
destructive = 'destructive',
}

export enum BtnSizes{
    lg = "lg",
    sm = "sm",
    md = "md",
    xs = "xs",
} 
 
 
 export function getBtnSize(size:BtnSizes | null | undefined){
   let sizeCss;
   switch(size){
    
     case "lg":
        sizeCss="h-10 rounded-md px-6 has-[>svg]:px-4";
        break;

     case "sm":
        sizeCss="h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5";
        break;

     case "md":
        sizeCss="h-9 px-4 py-2 has-[>svg]:px-3";
        break;

       default: 
        sizeCss="h-9 px-4 py-2 has-[>svg]:px-3";
        break;
   }
   return sizeCss;
 }
 export function getBtnVariant(variant:BtnVariant | null | undefined){
    let  variantCss;
    switch(variant){
      
       case "outline":
       variantCss = "bg-transparent outline"
       break;

        case "primary":
        variantCss="bg-primary";
        break;

        case "secondary":
        variantCss="bg-secondary";
        break;
        case "destructive":
        variantCss="bg-destructive text-white hover:bg-destructive/90 focus-visible:ring-destructive/20";
        break;

       default:
        variantCss="bg-primary text-primary-foreground hover:bg-primary/90";
       break; 
    }
    return variantCss;
}

